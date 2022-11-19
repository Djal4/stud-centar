import Header from "../components/Header";
import NavigationPanel from "../components/NavigationPanel";
import useFetch from "../hooks/useFetch";
import useSessionStorage from "../hooks/useSessionStorage";
import { useNavigate } from "react-router-dom";
import Loader from "../components/Loader";
import Card from "../components/Card";
import "../css/e-dom.css";
import { useRef, useState } from "react";

export default function EDom(){
    const navigate=useNavigate();
    const [submitMessage,setSubmitMessage]=useState({});
    const [token]=useSessionStorage("token");
    const contentRef=useRef();
    if(token==null)
        navigate("/");
    const {value,error,loading}=useFetch(`${process.env.REACT_APP_server}/api/showLoggedUser`,{headers:{
        "Authorization":"Bearer "+token
    }});
    if(error!==undefined && error!==null)
        navigate("/");
    if(loading)
        return <Loader/>;
        console.log(value)
        const createTicket=()=>{
            let datum=new Date();
            let time=datum.getFullYear()+"-"+datum.getMonth().toString().padStart(2,"0")+"-"+datum.getDate().toString().padStart(2,"0")+" "+datum.getHours()+":"+datum.getMinutes()+":"+datum.getSeconds();
            fetch(`${process.env.REACT_APP_server}/api/ticket`,{
                method:"POST",
                headers:{
                    "Authorization":"Bearer "+token,
                    "Content-Type":"application/json"
                },
                body:JSON.stringify({
                    user_id:value.id,
                    content:contentRef.current.value,
                    time:time
                })
            }).then(res=>{
                if(!res.ok){
                    setSubmitMessage({status:"fail",message:"Ticket creation failed."});
                }else{
                    setSubmitMessage({status:"success",message:"Ticket created successfully."});
                }
            })
        };
    return(
        <>
        <Header/>
        <main>
            <NavigationPanel/>
            <div id="main-footer">
                <Card data={value}/>
                <div className="ticket-container">
                    <h1>Prijavi kvar</h1>
                    <textarea placeholder="Opis kvara" name="opis-kvara" ref={contentRef}></textarea>
                    <div className="absolute-center">
                        <button onClick={createTicket}>Prijavi kvar</button>
                    </div>
                    <div className="absolute-center">
                        <p style={{color:submitMessage.status==="success"?"green":"red"}}>{submitMessage.message}</p>
                    </div>
                </div>
            </div>
        </main>
        </>
    );
}
import { useEffect, useState } from "react";
import Login from "../components/Login";
import Loader from "../components/Loader";
import useSessionStorage from "../hooks/useSessionStorage";
import Feeds from "../components/Feeds";

export default function Home(){
    const [loading,setLoading]=useState(true);
    const [token,setToken]=useSessionStorage("token");
    useEffect(()=>{
        (async()=>{
            if(token===null)
            {
                setLoading(false);                
                return;
            }
            let response=await fetch(`${process.env.REACT_APP_server}/api/showLoggedUser`,{
                headers:{
                    "Authorization":"Bearer "+token
                }
            });
            if(!response.ok){
                setToken(null);
                setLoading(false);
                return;
            }
            setLoading(false);
        })();
    },[token,setToken]);
    if(loading)
        return <Loader/>;
    if(token!==null)
        return <><Feeds setToken={setToken}/></>;
    return <Login token={token} setToken={setToken}/>;
}
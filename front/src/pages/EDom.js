import Header from "../components/Header";
import NavigationPanel from "../components/NavigationPanel";
import useFetch from "../hooks/useFetch";
import useSessionStorage from "../hooks/useSessionStorage";
import { useNavigate } from "react-router-dom";
import Loader from "../components/Loader";
import Card from "../components/Card";

export default function EDom(){
    const navigate=useNavigate();
    const [token]=useSessionStorage("token");
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
    return(
        <>
        <Header/>
        <main>
            <NavigationPanel/>
            <div id="main-footer">
                <Card data={value}/>
            </div>
        </main>
        </>
    );
}
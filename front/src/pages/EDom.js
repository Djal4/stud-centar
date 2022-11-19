import Header from "../components/Header";
import NavigationPanel from "../components/NavigationPanel";
import useFetch from "../hooks/useFetch";
import useSessionStorage from "../hooks/useSessionStorage";
import { useNavigate } from "react-router-dom";
import Loader from "../components/Loader";


export default function EDom(){
    const navigate=useNavigate();
    const [token,setToken]=useSessionStorage("token");
    if(token==null)
        navigate("/");
    const {value,error,loading}=useFetch(`${process.env.REACT_APP_server}/api/showLoggedUser`,{headers:{
        "Authorization":"Bearer "+token
    }});
    if(error!=undefined)
        navigate("/");
    if(loading)
        return <Loader/>;
        console.log(value)
    return(
        <>
        <Header/>
        <main>
            <NavigationPanel/>
            <div id="main-footer"></div>
        </main>
        </>
    );
}
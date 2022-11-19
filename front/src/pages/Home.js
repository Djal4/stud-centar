import { useEffect, useState } from "react";
import Login from "../components/Login";
import Loader from "../components/Loader";
import useSessionStorage from "../hooks/useSessionStorage";

export default function Home(){
    const [loading,setLoading]=useState(true);
    const [token,setToken]=useSessionStorage("token");
    const [user,setUser]=useState();
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
                setUser(null);
                setToken(null);
                setLoading(false);
                return;
            }
            let responseBody=await response.json();
            setUser(responseBody);
            setLoading(false);
        })();
    },[token,setToken]);
    if(loading)
        return <Loader/>;
    if(token!==null)
        return <>{JSON.stringify(user)}</>;
    return <Login token={token} setToken={setToken}/>;
}
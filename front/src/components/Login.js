import { useRef } from "react";
import "../css/login.css";
import Logo from '../images/logo-login.png';

export default function Login({setToken}){
    const login=async()=>{
        const form=document.forms["login"];
        try{
            if(!form.checkValidity()){
                form.classList.remove("bad-credentials");
                form.classList.add("invalid");
                return;
            }
                
            let requestBody={
                email:emailRef.current.value,
                password:passwordRef.current.value
            };
            let response=await fetch(`${process.env.REACT_APP_server}/api/login`,{
                method:"POST",
                body:JSON.stringify(requestBody),
                headers:{
                    "Content-Type":"application/json",
                    "Accept":"application/json"
                }
            });
            if(!response.ok)
                throw new Error();
            let responseBody=await response.json();
            setToken(responseBody.token);
        }
        catch(error){
            form.classList.add("bad-credentials");
        }
    };
    const emailRef=useRef();
    const passwordRef=useRef();
    return(
        <>
            <main id="main" className="absolute-center full-size">
            <img src={Logo} alt="Logo" id="logo-id"/>
                <div id="login-container">
                    <p className="login-p">PRIJAVA</p>
                    <form onSubmit={(event)=>event.preventDefault()} name="login">
                        <div className="text-field">
                            <i className="bi bi-envelope"></i>
                            <input type="email" name="email" ref={emailRef} placeholder="Email" required />
                        </div>
                        <p>Email je obavezan!</p>
                        <br/>
                        <div className="text-field">
                            <i className="bi bi-key"></i>
                            <input type="password" name="current-password" ref={passwordRef} placeholder="Lozinka" required/>
                        </div>
                        <p>Lozinka je obavezna!</p>
                        <p className="forgot-pass">Zaboravili ste lozinku?</p>
                        <div className="sign-in absolute-center">
                            <button className="absolute-center child-full-size" onClick={login} formNoValidate>Uloguj se</button>
                        </div>
                        <p className="bad-credentials">Email ili lozinka su loše uneti</p>
                    </form>
                </div>
            </main>
        </>
    );
}
import logo from "../images/logo.png";
import personCircle from "../images/person-circle.png";
import "../css/header.css";
import { useState } from "react";
export default function Header(){
    const [menuOpened,setMenuOpened]=useState(false);
    return(
        <>
        <header className="e-dom">
            <div className="absolute-center">
                <img src={logo} alt="Logo"/>
            </div>
            <div className="menu-button">
                <div className="absolute-center">
                    <p>Moj profil</p>
                </div>
                <div className="absolute-center" onClick={()=>setMenuOpened(menu=>!menu)}>
                    <img src={personCircle} alt="Person circle"/>
                </div>
            </div>
        </header>
        <div className="menu" style={{display:menuOpened?"flex":"none"}}>
            <div className="menu-item">Vidi profil</div>
            <div className="menu-item">Promeni lozinku</div>
            <div className="menu-item">Odjavi se</div>
        </div>
        </>
    );
}
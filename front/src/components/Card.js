import personCard from "../images/person-circle.png";
import mortarboard from "../images/logo.png";
import qrCode from "../images/qr-code.png";
import { useState } from "react";
import ReactModal from "react-modal";
import "../css/card.css";

export default function Card({data}){
    const [modalIsOpened,setModalIsOpened]=useState(false);
    const handleCloseModal=()=>setModalIsOpened(false);
    return(
        <>
            <div className="card">
                <div className="card-first">
                    <img src={data.photo!=null? data.photo:personCard} alt="person card"/>
                    <div className="absolute-center">
                        <img src={mortarboard} alt="logo"/>
                    </div>
                    <img src={qrCode} alt="qrCode"/>
                </div>
                <div className="card-sec">
                    <div>
                        <p>Ime:</p>
                        <p>{data.name}</p>
                        </div>
                    <div>
                        <p>Prezime:</p>
                        <p>{data.lastname}</p>
                    </div>
                    <div>
                        <p>Studira:</p>
                        <p>Pmf</p>
                    </div>
                    <div>
                        <p>Datum izdavanja</p>
                        <p>01.10.2020.</p>
                    </div>
                    <div>
                        <p>Br. kartice:</p>
                        <p>6548348</p>
                    </div>
                    <div>
                        <p>God rodjenja:</p>
                        <p>{new Date(data.year_of_birth).getFullYear()}.</p>
                    </div>
                    <div>
                        <p>Br. indeksa:</p>
                        <p>87/2020</p>
                    </div>
                    <div>
                        <p>Datum isteka:</p>
                        <p>31.10.2024.</p>
                    </div>
                </div>
            </div>
            <button className="button btn-spec" onClick={()=>setModalIsOpened(true)}>E-kartica</button>
            <ReactModal
            isOpen={modalIsOpened}
            onRequestClose={handleCloseModal}
            >

            </ReactModal>
        </>
    );
}
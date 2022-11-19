import Header from "../components/Header";
import NavigationPanel from "../components/NavigationPanel";
import personCard from "../images/person-card.png";
import mortarboard from "../images/logo.png";
import qrCode from "../images/qr-code.png";
import food from "../images/food.png";
import "../css/e-menza.css";
import ReactModal from "react-modal";
import { useState} from "react";
import closeButton from "../images/close-button.png";

export default function EMenza(){
    const [modalIsOpened,setModalIsOpened]=useState(false);
    const openModal=()=>setModalIsOpened(true);
    const handleClose=()=>setModalIsOpened(false);
    const [brojDorucaka,setBrojDorucaka]=useState(1);
    const handleBrojDorucka=(event)=>setBrojDorucaka(event.target.value);
    const [brojRucaka,setBrojRucaka]=useState(1);
    const handleBrojRucaka=(event)=>setBrojRucaka(event.target.value);
    const [brojVecera,setBrojVecera]=useState(1);
    const handleBrojVecera=(event)=>setBrojVecera(event.target.value);
    return(
        <>
        <ReactModal
        isOpen={modalIsOpened}
        onRequestClose={handleClose}
        className="menza-modal">
            <img src={closeButton} alt="close button" className="close-button" onClick={handleClose}/>
            <h1 className="modal-title">Dopuni karticu</h1>
            <div className="modal-body">
                <div className="cenovnik">
                    <div className="cenovnik-column">
                        <div className="cena">Doručak 99din</div>
                        <div className="cena">Ručak 99din</div>
                        <div className="cena">Večera 99din</div>
                    </div>
                    <div className="cenovnik-column">
                        <input type="number" min={1} defaultValue="1" className="kolicina" onChange={handleBrojDorucka}/>
                        <input type="number" min={1} defaultValue="1" className="kolicina" onChange={handleBrojRucaka}/>
                        <input type="number" min={1} defaultValue="1" className="kolicina" onChange={handleBrojVecera}/>
                    </div>
                    <div className="cenovnik-column">
                    <div className="ukupno">{brojDorucaka*99}din</div>
                        <div className="ukupno">{brojRucaka*99}din</div>
                        <div className="ukupno">{brojVecera*99}din</div>
                    </div>
                </div>
                <div className="ukupno">
                    <p>Ukupno: <span>{(brojDorucaka+brojRucaka+brojVecera)*99}din</span></p>
                </div>
				<div className="submit-meals absolute-center">
					<button>Potvrdi</button>
				</div>
            </div>
        </ReactModal>
        <Header/>
        <main>
            <NavigationPanel/>
            <div id="hero">
	
	<div className="card">
		<div className="card-first">
			<img src={personCard} alt="person card"/>
			<div className="absolute-center">
				<img src={mortarboard} alt="logo"/>
			</div>
			<img src={qrCode} alt="qrCode"/>
		</div>
		<div className="card-sec">
			<div>
				<p>Ime:</p>
				<p>Uroš</p>
			</div>
			<div>
				<p>Prezime:</p>
				<p>Tatomir</p>
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
				<p>2001.</p>
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

	<button className="button btn-spec">E-kartica</button>

	<div id="month">
		<p>Mesec: </p><p>Novembar</p>
	</div>

	<div id="meal-list">

		<div className="meal-type dorucak">
			<img src={food} alt="food"/>
			<p>Doručak</p>
			<p id="spec-font">7</p>
			<button className="button" onClick={openModal}>Dopuni</button>
		</div>
		<div className="meal-type rucak">
        <img src={food} alt="food"/>
			<p>Ručak</p>
			<p id="spec-font">7</p>
			<button className="button" onClick={openModal}>Dopuni</button>
		</div>
		<div className="meal-type vecera">
        <img src={food} alt="food"/>
			<p>Večera</p>
			<p id="spec-font">7</p>
			<button className="button" onClick={openModal}d>Dopuni</button>
		</div>

	</div>

</div>
        </main>
        </>
    );
}
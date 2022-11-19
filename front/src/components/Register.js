import '../css/register.css';
export default function Register(){
    return(
        <main id="main">
	<div className="register-container">
		<p className="register-p">Kreiranje naloga</p>
		<form>

			<div id="first-container">
				<div className="profile-pic-div">
					<input type="file" id="file"/>
					<label htmlFor="file">
						<i className="bi bi-person-fill pic" htmlFor="file"></i>
						
					</label>
					<label className="label" htmlFor="file">Izaberi sliku</label>
				</div>

				<div id="personal-info">
					<input type="text" name="" placeholder="Ime" className="input"/>
					<input type="text" name="" placeholder="Prezime"className="input"/>
				</div>
			</div>

			<div id="employed-student-container">
				<p>Zaposleni</p>
				<p style={{color:"#FFFFFF"}}>/</p>
				<p>Student</p>
			</div>

			<div id="other-info">
				<div className="text-field">
					<i className="bi bi-envelope"></i>
					<input type="text" name="Email" placeholder="Email" />
				</div>
				<div className="text-field">
					<i className="bi bi-key"></i>
					<input type="text" name="Lozinka" placeholder="Password" />
				</div>
				<div className="text-field">
					<i className="bi bi-calendar3-event"></i>
					<input type="text" name="yob" placeholder="Datum rodjenja" />
				</div>
			</div>

			<button id="create-account">Prijavi se</button>

			

		</form>
	</div>
</main>
    );
}
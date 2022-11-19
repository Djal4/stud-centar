import '../css/register.css';
export default function Register(){
    return(
        <main id="main">
	<div className="register-container">
		<p className="register-p">Create account</p>
		<form>

			<div id="first-container">
				<div className="profile-pic-div">
					<input type="file" id="file"/>
					<label htmlFor="file">
						<i className="bi bi-person-fill pic" htmlFor="file"></i>
						
					</label>
					<label className="label" htmlFor="file">choose photo</label>
				</div>

				<div id="personal-info">
					<input type="text" name="" placeholder="name" className="input"/>
					<input type="text" name="" placeholder="lastname"className="input"/>
				</div>
			</div>

			<div id="employed-student-container">
				<p>employed</p>
				<p style={{color:"#FFFFFF"}}>/</p>
				<p>student</p>
			</div>

			<div id="other-info">
				<div className="text-field">
					<i className="bi bi-envelope"></i>
					<input type="text" name="email" placeholder="Email" />
				</div>
				<div className="text-field">
					<i className="bi bi-key"></i>
					<input type="text" name="password" placeholder="Password" />
				</div>
				<div className="text-field">
					<i className="bi bi-calendar3-event"></i>
					<input type="text" name="yob" placeholder="Year of birth" />
				</div>
			</div>

			<button id="create-account">Create account</button>

			

		</form>
	</div>
</main>
    );
}
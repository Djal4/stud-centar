import "../css/login.css";

export default function Login(){
    return(
        <>
            <main id="main" className="absolute-center full-size">
                <div id="login-container">
                    <p className="login-p">LOGIN</p>
                    <form onSubmit={(event)=>event.preventDefault()} name="login">
                        <div className="text-field">
                            <i className="bi bi-envelope"></i>
                            <input type="text" name="username" placeholder="Email" />
                        </div>
                        <br/>
                        <div className="text-field">
                            <i className="bi bi-key"></i>
                            <input type="text" name="password" placeholder="Password" />
                            </div>
                        <p className="forgot-pass">Forgot your password?</p>
                        <div className="sign-in absolute-center">
                            <button className="absolute-center child-full-size">Sign in</button>
                        </div>
                    </form>
                </div>
            </main>
        </>
    );
}
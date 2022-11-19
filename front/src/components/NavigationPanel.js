import { Link } from "react-router-dom";
import "../css/navigation.css";
import houses from "../images/houses-fill.png";
import egg from "../images/egg-fried.png";
import building from "../images/buildings-fill.png";
import creditCard from "../images/credit-card-fill.png";

export default function NavigationPanel(){
    return(
        <div className="main-header absolute-center">
                <nav>
                    <div className="nav-row">
                    <Link to="/">
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={houses} alt="Houses"/>
                            </div>
                            <div className="absolute-center">
                                Početna
                            </div>
                            </div>
                    </Link>
                    <Link to="/e-menza">    
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={egg} alt="Egg"/>
                            </div>
                            <div className="absolute-center">
                                E-menza
                            </div>
                        </div>
                        </Link>
                    </div>
                    
                    <div className="nav-row">
                    <Link to="/e-dom">
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={building} alt="Building"/>
                            </div>
                            <div className="absolute-center">
                                E-dom
                            </div>
                        </div>
                       
                        </Link>
                        <Link to="/uplata-racuna">
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={creditCard} alt="Credit card"/>
                            </div>
                            <div className="absolute-center">
                                Uplata racuna
                            </div>
                        </div>
                        </Link>
                    </div>
                </nav>
            </div>
    );
}
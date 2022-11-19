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
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={houses} alt="Houses"/>
                            </div>
                            <div className="absolute-center">
                                <Link to="/">Početna</Link>
                            </div>
                        </div>
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={egg} alt="Egg"/>
                            </div>
                            <div className="absolute-center">
                                <Link to="/e-menza">E-menza</Link>
                            </div>
                        </div>
                    </div>
                    
                    <div className="nav-row">
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={building} alt="Building"/>
                            </div>
                            <div className="absolute-center">
                                <Link to="/e-dom">E-dom</Link>
                            </div>
                        </div>
                        <div className="nav-item">
                            <div className="absolute-center">
                                <img src={creditCard} alt="Credit card"/>
                            </div>
                            <div className="absolute-center">
                                <Link to="/uplata-racuna">Uplata racuna</Link>
                            </div>
                        </div>
                        
                    </div>
                </nav>
            </div>
    );
}
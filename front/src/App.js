import './App.css';
import { BrowserRouter as Router,Route,Routes} from 'react-router-dom';
import Home from './pages/Home';
import Register from './components/Register';
import EDom from './pages/EDom';

function App() {
    return (
        <div className="App">
            <Router>
                <Routes>
                    <Route path='/' element={<Home/>} />
                    <Route path='/create-account' element={<Register/>}/>
                    <Route path='/e-dom' element={<EDom/>}/>
                    <Route path='/test' element={<Register/>} />
                </Routes>
            </Router>
        </div>
    );
}

export default App;

import Header from "../components/Header";
import NavigationPanel from "../components/NavigationPanel";



export default function EDom(){
    return(
        <>
        <Header/>
        <main>
            <NavigationPanel/>
            <div id="main-footer"></div>
        </main>
        </>
    );
}
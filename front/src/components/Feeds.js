import Header from "./Header";
import NavigationPanel from "./NavigationPanel";
import "../css/feed.css";

export default function Feeds({setToken}){
    return(
        <>
        <Header setToken={setToken}/>
        <main>
            <NavigationPanel/>
        <div id="feed-table">
	<div id="search-field">
		<input type="text" placeholder="Pretraga po nazivu ili autoru" />
		{/* <input type="text" placeholder="Datum oglasa" /> */}
		<input type="date" id="start" name="trip-start"
       value="2022-11-19"
       min="2018-01-01" max="2022-11-19" placeholder="Datum oglasa"/>
	</div>
	<div>
		<table>
			<tr className="first">
				<th>Naziv oglasa</th>
				<th>Datum</th>
				<th>Autor</th>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>
			<tr>
				<td>Promena radnog vremena menze</td>
				<td>19.11.2022</td>
				<td>Studentski centar</td>
			</tr>

		</table>
	</div>
</div>
</main>
        </>
    );
}
import {React, useState} from 'react';

const App = (props) => {
    const [listes, setListes] = useState([]);
    const [element, setElement] = useState("");

    const handleChangesElement = (evt) => {

        setElement(evt.target.value);
        if (evt.target.value.length >= 2) {
            handleChangeArray(evt.target.value)
        }

    }

    const handleChangeArray = (v) => {
        let url = "http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=" + v


        fetch(url).then(response => response.json().then(data => {
                console.log(data)
                setListes(data.results)


            }
        ))
        console.log(url)

    }


    return (
        <>


            <input type="text" value={element} onChange={handleChangesElement}/>


    <div>
            {listes.map((a, i) => (
                <>   {a.poster_path ?


                    <img key={i} src={"http://image.tmdb.org/t/p/w185" + a.poster_path}
                         alt={a.original_title} title={a.original_title}/>
                    : <img key={i} src=""/>

                }</>

            ))}
    </div>
        </>
    );
}

export {App};
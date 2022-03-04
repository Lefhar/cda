import {React, useState} from 'react';

const App = (props) => {
    const [listes, setListes] = useState([]);
    const [element, setElement] = useState("");

    const handleChangesElement = (evt) => {
        setElement(evt.target.value);
    }

    const handleChangeArray = () =>{
        setListes((listes) => listes.concat(element))
        setElement("");
}

return (
    <div>
        <div>
            <ul>
                {listes.map((a, i) => (
                    <li key={i}>{a}</li>
                ))}
            </ul>
        </div>
        <input type="text" value={element} onChange={handleChangesElement}/>

        <button onClick={handleChangeArray}>
        add
    </button>
</div>
)
;
}

export {App};
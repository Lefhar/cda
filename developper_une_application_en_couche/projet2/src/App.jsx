import {React, useState} from 'react';

const App = (props) => {

    const [nom, setNom] = useState("");
    const [prenom, setPrenom] = useState("");
    const handleChangeNom = (evt) => {
        setNom(evt.target.value);
    }

    const handleChangePrenom = (evt) => {
        setPrenom(evt.target.value);
    }

    return (
        <div>
            <div>
                Bonjour
                &nbsp;
                <span className='bolder'>
                    {nom}
                </span>
                &nbsp;

                <span className='bolder'>
                    {prenom}
                </span>


            </div>

            <input type="text" value={nom} onChange={handleChangeNom}/>
            <input type="text" value={prenom} onChange={handleChangePrenom}/>
        </div>
    );
}

export { App };
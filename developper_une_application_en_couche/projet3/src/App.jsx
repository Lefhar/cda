import {React, useState} from 'react';

const App = (props) => {


    const [count, setCount] = useState(0)


    return (
        <div>
            <div>

              <span className='bolder'>
                    {count}
                </span>

            </div>
            <button onClick={() => setCount(count + 1)}>+1</button>
            <button onClick={() => setCount(count - 1)}>-1</button>
        </div>
    );
}

export { App };
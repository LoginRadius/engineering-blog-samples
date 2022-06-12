import {createSignal} from 'solid-js'


function AddTodo({addTodo}){

    const [newTodo,setNewTodo]=createSignal('')

    const handleChange=(e)=>setNewTodo(e.target.value)

    const handleClick=()=>{
        addTodo(newTodo)
        setNewTodo('')
    }
    
    return(
        <div>
            <input 
                onChange={handleChange} 
                value={newTodo()} type="text" 
                placeholder="Type a new todo..."
            />
            <button onClick={handleClick}>Add Todo</button>
        </div>
    )
}

export default AddTodo;
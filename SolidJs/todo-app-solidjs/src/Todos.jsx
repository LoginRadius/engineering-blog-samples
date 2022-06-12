import { For } from 'solid-js';
import TodoItem from './TodoItem';

function Todos({todos,deleteTodo}){
    console.log(todos())
    return(
        <For each={todos()}>{(todo,ind)=>
            <TodoItem 
                deleteTodo={deleteTodo} 
                todo={todo} 
            />
        }
        </For>
    )

}

export default Todos;
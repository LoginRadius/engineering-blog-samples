import styles from './App.module.css';
import {createSignal} from 'solid-js'
import Todos from './Todos';
import AddTodo from './AddTodo';

function App() {
  const [todos,setTodos]=createSignal([])

  const addTodo=(newTodo)=>{
    setTodos([newTodo(),...todos()]);
  }

  const deleteTodo=(todo)=>{
    let newTodos=todos;
    newTodos=newTodos().filter(_todo=>_todo!=todo);
    setTodos(newTodos)
  }

  return (
    <div class={styles.App}>
      <h1 class={styles.heading}>Todos</h1>
      <AddTodo addTodo={addTodo}/>
      <Todos deleteTodo={deleteTodo} todos={todos}/>
    </div>
  );
}

export default App;

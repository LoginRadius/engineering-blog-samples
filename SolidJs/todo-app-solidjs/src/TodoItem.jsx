function TodoItem({todo,deleteTodo}){
    const handleDelete=()=>deleteTodo(todo);
    return(
        <p onClick={handleDelete}>{todo}</p>
    )
}

export default TodoItem;
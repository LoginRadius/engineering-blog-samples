import {  Link, useNavigate } from "@solidjs/router";
import { createSignal } from "solid-js";


export default function Login(){
    const navigate=useNavigate();
    console.log(import.meta.env)
    const [emailPassword, setEmailPassword] = createSignal({
        email:'',
        password:'',
    });

    const [loading,setLoading]=createSignal(false)

    const handleChange=(e)=>{
        setEmailPassword({
            ...emailPassword(),
            [e.target.id]:e.target.value
        })
    }
    
    const handleSubmit=(e)=>{
        e.preventDefault();
        console.log(emailPassword())
        const endpoint=`https://api.loginradius.com/identity/v2/auth/login?apikey=${import.meta.env.VITE_APP_LOGINRADIUS_API_KEY}&apisecret=${import.meta.env.VITE_APP_LOGINRADIUS_API_SECRET}`
        fetch(endpoint,
         {
            method:'POST',
            headers: {
            'Content-Type': 'application/json'
            },
            body:JSON.stringify({
                email:emailPassword().email,
                password:emailPassword().password
            })
         })
         .then(response=>response.json())
         .then(data=>{
            if(data.ErrorCode){
                alert(data.Message)
            }else{
                localStorage.setItem('user_id',data.Profile.Uid)
                navigate('/')

            }
         })
    }

    return(
        <div className="card">
           <h3 className="title"> Login </h3>
           <p className="subtitle">Don't have an account yet?  <Link href="/signup">Signup</Link> </p>
           <form onSubmit={handleSubmit} onChange={handleChange}>
                <input id="email" type="text" placeholder="Email" />
                <input id="password" type="password" placeholder="Password" />
                <button>Login </button>
           </form>
        </div>
    )
}


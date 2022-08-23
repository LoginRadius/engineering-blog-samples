import {  Link, useNavigate } from "@solidjs/router";
import { createSignal } from "solid-js";


export default function Signup(){
    const navigate = useNavigate();

    const [accountDetails, setAccountDetails] = createSignal({
        firstName:'',
        lastName:'',
        email:'',
        password:'',
    });

    const handleChange=(e)=>{
        setAccountDetails({
            ...accountDetails(),
            [e.target.id]:e.target.value
        })
    }
    
    const handleSignup=(e)=>{
        e.preventDefault();
        console.log(accountDetails());
       
        const endpoint=`https://api.loginradius.com/identity/v2/manage/account?apikey=${import.meta.env.VITE_APP_LOGINRADIUS_API_KEY}&apisecret=${import.meta.env.VITE_APP_LOGINRADIUS_API_SECRET}`
        fetch(endpoint,
         {
            method:'POST',
            headers: {
            'Content-Type': 'application/json'
            },
            body:JSON.stringify({
                "FirstName":accountDetails().firstName,
                "LastName":accountDetails().lastName,
                "Email": [
                    {
                      "Type": "Primary",
                      "Value": accountDetails().email
                    }
                ],
                "Password":accountDetails().password
            })
         })
         .then(response=>response.json())
         .then(data=>{
            console.log({data})
            if(data.ErrorCode){
                alert(data.Message);
                setAccountDetails({
                    firstName:'',
                    lastName:'',
                    email:'',
                    password:'',
                })
            }else{
                if(data.Uid){
                    localStorage.setItem('user_id',data.uid)
                    navigate("/");
                }
            }
         })
    }
    return(
        <div className="card">
            <h3 className="title"> Signup </h3>
            <p className="subtitle">Already have an account? 
                <Link href="/login">Login</Link>
             </p>
            <form onChange={handleChange} onSubmit={handleSignup}>
                <input id="firstName" type="text" placeholder="First Name" />
                <input id="lastName" type="text" placeholder="Last Name" />
                <input id="email" type="text" placeholder="Email" />
                <input id="password" type="password" placeholder="Password" />
                <button>Signup </button>
            </form>
        </div>
    )
}


import { createEffect, createSignal, Show,  } from "solid-js";
import { useNavigate } from '@solidjs/router';

export default function Home(){
    const [userData,setUserData]=createSignal(null);

    const getUserDetails=()=>{
        const navigate=useNavigate()
        const uid=localStorage.getItem('user_id');
        if(!uid) navigate('/login');
        const endpoint=`https://api.loginradius.com/identity/v2/manage/account/${uid}?apikey=${import.meta.env.VITE_APP_LOGINRADIUS_API_KEY}&apisecret=${import.meta.env.VITE_APP_LOGINRADIUS_API_SECRET}`

        fetch(endpoint)
        .then(response=>response.json())
        .then(data=>{
            setUserData(data)
        })

    }
    
    createEffect(()=>{
        console.log('user data',userData());
    })

    createEffect(() => {
        getUserDetails()
      });
    return(
        <div className="home">

            <h1>Welcome</h1>
            <Show when={userData()}>
               <p>{userData().Email[0].Value}</p> 
               <p> {userData().FirstName} {userData().LastName}</p>
                
            </Show>
            
        </div>
    )
}


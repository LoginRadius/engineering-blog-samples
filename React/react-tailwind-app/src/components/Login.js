import { useState } from 'react';
import { loginFields } from "../constants/formFields";
import FormAction from "./FormAction";
import FormExtra from "./FormExtra";
import Input from "./Input";

const fields=loginFields;
let fieldsState = {};
fields.forEach(field=>fieldsState[field.id]='');

export default function Login(){
    const [loginState,setLoginState]=useState(fieldsState);

    const handleChange=(e)=>{
        setLoginState({...loginState,[e.target.id]:e.target.value})
    }

    const handleSubmit=(e)=>{
        e.preventDefault();
        authenticateUser();
    }

    //Handle Login API Integration here
    const authenticateUser = () =>{
        
     
        // let loginFields={
        //         email:loginState['email-address'],
        //         password:loginState['password']
        // };
           
        // const endpoint=`https://api.loginradius.com/identity/v2/auth/login?apikey=${apiKey}&apisecret=${apiSecret}`;
        //  fetch(endpoint,
        //      {
        //      method:'POST',
        //      headers: {
        //      'Content-Type': 'application/json'
        //      },
        //      body:JSON.stringify(loginFields)
        //      }).then(response=>response.json())
        //      .then(data=>{
        //         //API Success from LoginRadius Login API
        //      })
        //      .catch(error=>console.log(error))
         }
    

    return(
        <form className="mt-8 space-y-6" onSubmit={handleSubmit}>
        <div className="-space-y-px">
            {
                fields.map(field=>
                        <Input
                            key={field.id}
                            handleChange={handleChange}
                            value={loginState[field.id]}
                            labelText={field.labelText}
                            labelFor={field.labelFor}
                            id={field.id}
                            name={field.name}
                            type={field.type}
                            isRequired={field.isRequired}
                            placeholder={field.placeholder}
                    />
                
                )
            }
        </div>

        <FormExtra/>
        <FormAction handleSubmit={handleSubmit} text="Login"/>

      </form>
    )
}
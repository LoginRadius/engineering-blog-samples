<script>
    
    import { useNavigate } from "svelte-navigator";
    const navigate = useNavigate();
    import {user} from './stores';

    let email;
    let password;
    let loading;

    let loginResponse={
        error:null,
        success:null,
        profile:null,
        auth_token:null
    }

    export let sdkoptions;

    const navigateToSignup=()=>navigate('/signup')

    const handleSubmit=(e)=>{
       let loginFields={email,password};
       const endpoint=`https://api.loginradius.com/identity/v2/auth/login?apikey=${sdkoptions.apiKey}&apisecret=${sdkoptions.apiSecret}`;
       loading=true;
       loginResponse={
        error:null,
        success:null,
        profile:null,
        auth_token:null
    }
    fetch(endpoint,
        {
        method:'POST',
        headers: {
        'Content-Type': 'application/json'
        },
        body:JSON.stringify(loginFields)
        }).then(response=>response.json())
        .then(data=>{
            console.log(data)
            if(data.ErrorCode){
                if(data.ErrorCode==936){ 
                loginResponse={
                        ...loginResponse,
                        error:data.Message
                    }
                }
                else if(data.ErrorCode==1134){
                    loginResponse={
                        ...loginResponse,
                        error:data.Errors[0].ErrorMessage
                    }
                }else{
                    loginResponse={
                        ...loginResponse,
                        error:data.Description
                    }
                }
            }else{
                loginResponse={
                    ...loginResponse,
                    success:true,
                    profile:data.Profile,
                    auth_token:{
                        access_token:data.access_token,
                        refresh_token:data.refresh_token,
                        ttl:data.expires_in
                    }
                }
                user.set(loginResponse)
                localStorage.setItem('user',JSON.stringify(loginResponse))
                navigate('/')
            }
        })
        .catch(error=>console.log(error))
        .finally(()=>loading=false);
    }

</script>

<h3>Login </h3>
<form on:submit|preventDefault={handleSubmit}>
    <input class="form-field" bind:value={email} type="email" placeholder="Email" >
    <input class="form-field" bind:value={password} type="password" placeholder="Password" >
    <button disabled={loading} class="form-field">
        Login 
    </button>
</form>
{#if loginResponse.error}
	<p class="error">Error ❌ {loginResponse.error}</p>
{/if}
{#if loginResponse.success}
	<p class="success">
        Success ✔
    </p>
{/if}
<p>
    Don't have an account? 
    <strong class="link" on:click={navigateToSignup}>Sign up</strong>
</p>

<style>

</style>
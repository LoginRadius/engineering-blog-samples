import React from "react";
import config from "../config.js";
const LandingPage = () => {
  return (
    <div>
      <h1> React Demo App </h1>

      <a
        href={`https://${config.APP_NAME}.hub.loginradius.com/auth.aspx?action=register&return_url=${window.location.origin}/login`}
      >
        <button>Register</button>
      </a>

      <a
        href={`https://${config.APP_NAME}.hub.loginradius.com/auth.aspx?action=login&return_url=${window.location.origin}/login`}
      >
        <button>Login</button>
      </a>
    </div>
  );
};
export default LandingPage;

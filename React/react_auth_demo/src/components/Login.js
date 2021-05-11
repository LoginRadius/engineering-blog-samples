import React from "react";
import { withRouter } from "react-router-dom";
import config from "../config";

class Login extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      userProfileResponse: null,
    };
  }

  componentDidMount() {
    const token = new URLSearchParams(this.props.location.search).get("token");
    if (token) {
      fetch(
        "https://api.loginradius.com/identity/v2/auth/account?apikey=" +
          config.API_KEY,
        {
          method: "GET",
          headers: {
            Authorization: "Bearer " + token,
          },
        }
      )
        .then((res) => res.json())
        .then((res) => {
          this.setState({ userProfileResponse: res });
        })
        .catch((e) => {
          console.log(e);
        });
    } else {
      window.location.assign(
        `https://${config.APP_NAME}.hub.loginradius.com/auth.aspx?action=login&return_url=${window.location.origin}/login`
      );
    }
  }

  render() {
    const { userProfileResponse } = this.state;

    return (
      <div>
        <span style={{ whiteSpace: "pre-wrap", textAlign: "left" }}>
          {JSON.stringify(userProfileResponse, null, 4)}
        </span>
      </div>
    );
  }
}

export default withRouter(Login);

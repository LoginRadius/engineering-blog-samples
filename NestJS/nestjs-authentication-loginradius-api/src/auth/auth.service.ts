import { Injectable, UnauthorizedException } from '@nestjs/common';
import { UserDto } from './dto/user.dto';
import * as LRAuthPrrovider from 'loginradius-sdk'


let config = {
    apiDomain: "api.loginradius.com",
    apiKey: "b85f093d-5748-4894-94ab-ebb6728321c0",
    apiSecret: "daf70fb6-f6e7-45ac-b522-c67bb1f04587",
    siteName: "vepumuviquvidapo",
    apiRequestSigning: false,
    proxy: {
      host: "",
      port: "",
      user: "",
      password: "",
    },
  };
let lrv2 = LRAuthPrrovider(config);

let sott =   "f+i5dyE42VDAvmUwyroNBd9/JFKLmcr7WUU6pVnpXRVZn4TCRk+n7nFpWYZEVhWpGJbndPamPsnpdL1GVCS0PvpA6vmYZp4taiizh0vF6OA=*b2a8240af3974d03fe07e75f2f8f60e1"; //Required

   

@Injectable()
export class AuthService {
    async signup(registerUserDto: UserDto) {
        try {
            const response = await lrv2.authenticationApi
            .checkEmailAvailability(registerUserDto.email)
        if (response.isExist) {
            return "Email already in use"
        } 
        let authUserRegistrationModel = {
            email: [
              {
                type: "primary",
                value: registerUserDto.email,
              },
            ],
            password: registerUserDto.password,
          };
        let user = await lrv2.authenticationApi
        .userRegistrationByEmail(authUserRegistrationModel, sott)
        if(user) {
            return "Sign up successful"
        }
        } catch (error) {
            return error
              
        }   
    }
    async login(loginUserDTO: UserDto) {
        try {
            let emailAuthenticationModel = {
                email: loginUserDTO.email,
                password: loginUserDTO.password,
              };
            let user = await lrv2.authenticationApi
                .loginByEmail(emailAuthenticationModel)
            
            return {
                accessToken: user.access_token,
            }
        } catch (error) {
            return error
        }
    }

    async authenticate(accessToken: string) {

        try {
            const response = await lrv2.authenticationApi
            .authValidateAccessToken(accessToken)
            console.log(response)
           return response
        } catch (e) {
            throw new UnauthorizedException();
        }
    }
}

import { Controller, Get, Body, Post, UseGuards } from '@nestjs/common';
import { UserDto } from './dto/user.dto';
import { AuthService } from './auth.service';
import { AuthGuard } from './auth.guard';

// create config file
let config = {
  apiDomain: "api.loginradius.com",
  apiKey: process.env.API_KEY,
  apiSecret: process.env.API_SECRET,
  siteName: process.env.APP_NAME,
  apiRequestSigning: false,
  proxy: {
    host: "",
    port: "",
    user: "",
    password: "",
  },
};
// require login-radius-sdk package and pass in the config object
var lrv2 = require("loginradius-sdk")(config);

var sott = process.env.SOTT

@Controller('auth')
export class AuthController {
  constructor(private readonly authService: AuthService) { }

  @Post('signup')
  async signup(@Body() registerUserDto: UserDto) {
    let response = await this.authService.signup(registerUserDto)
    return response
  }
  @Post('login')
  async login(@Body() loginUserDto: UserDto) {
    let response = await this.authService.login(loginUserDto)
    return response
  }
  @UseGuards(AuthGuard)
  @Get('protected')
  async protected() {
    return "Access Granted"
  }
}

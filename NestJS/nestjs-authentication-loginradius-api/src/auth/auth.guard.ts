import { CanActivate, ExecutionContext, Injectable, UnauthorizedException } from '@nestjs/common';

import {AuthService } from './auth.service';
import { Request } from 'express';

@Injectable()
export class AuthGuard implements CanActivate {

    constructor(
        private readonly authService: AuthService,
    ) {}

    async canActivate(context: ExecutionContext): Promise<boolean> {
        const request: Request = context.switchToHttp().getRequest();

        const authheader = request.header('Authorization');
        const token = authheader && authheader.split(" ")[1];
        try {
            // Store the user on the request object if we want to retrieve it from the controllers
            let user = await this.authService.authenticate(token);
            request['user'] = "Authorized"
            return true;
        } catch (e) {
            console.log(e)
            throw new UnauthorizedException();
        }
    }
}
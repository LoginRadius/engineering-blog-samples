import { Module } from "@nestjs/common";
import { MongooseModule } from "@nestjs/mongoose";
import { UsersController } from "./users.controller";
import { UserSchema } from "./users.model";
import { UsersService } from "./users.service";

@Module({
    imports: [MongooseModule.forFeature([{name: 'user', schema: UserSchema}])],
    controllers: [UsersController],
    providers: [UsersService],
    exports: [UsersService]
})

export class UsersModule{}


import * as mongoose from 'mongoose';

export const UserSchema = new mongoose.Schema({
    username: {
        type: String,
        required: true,
        unique: true
    },
    password: {
        type: String,
        required: true
    },

}, { timestamps: true });

// User interface
export interface User extends mongoose.Document {
    _id: string;
    username: string;
    password: string;
}

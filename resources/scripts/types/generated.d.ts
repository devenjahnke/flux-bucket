declare namespace App.Data {
export type SharedData = {
user: App.Data.UserData;
};
export type UserData = {
id: number;
name: string;
email: string;
};
}

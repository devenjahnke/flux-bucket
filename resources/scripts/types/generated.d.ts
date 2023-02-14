declare namespace App.Data {
export type NotificationData = {
type: App.Enums.NotificationType;
body: string;
};
export type SharedData = {
user: App.Data.UserData;
notification: App.Data.NotificationData | null;
};
export type UserData = {
id: number;
name: string;
email: string;
};
}
declare namespace App.Enums {
export type NotificationType = {
name: string;
value: string;
};
export type UserRole = {
name: string;
value: string;
};
}

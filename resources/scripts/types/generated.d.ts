declare namespace App.Data {
export type OrderData = {
id: number | null;
reference_number: string;
user: App.Data.Shared.UserData;
product: App.Data.ProductData;
status: any;
notes: string | null;
};
export type ProductData = {
id: number | null;
name: string;
description: string;
price: App.ValueObjects.Money;
image: string;
is_favorite: boolean | null;
};
}
declare namespace App.Data.Shared {
export type NotificationData = {
type: App.Enums.NotificationType;
body: string;
};
export type SharedData = {
user: App.Data.Shared.UserData;
notification: App.Data.Shared.NotificationData | null;
cart: App.Data.ProductData | null;
};
export type UserData = {
id: number;
name: string;
email: string;
role: App.Enums.UserRole;
favorite_product?: App.Data.ProductData | null;
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
declare namespace App.ValueObjects {
export type Money = {
cents: number;
dollars: number;
};
}

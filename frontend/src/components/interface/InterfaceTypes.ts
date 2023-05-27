export interface ILogin {
  email: String
  password: String
}

export interface IResponse {
  success?: Boolean
  message?: String
}
export interface ITransaction extends IResponse {
  id: number
  value: any
  user_id: number
  item_id: number
  status: String
  total: number
  created_at: Date
  updated_at: Date
  location_logs: [
    {
      id: number
      transaction_id: number
      location: String
      created_at: Date
      updated_at: Date
    }
  ]
}
export interface ILocation extends IResponse {
  transaction_id: number
  location: String
}
export interface IOrderedItem extends IResponse {
  transaction_id: number
  item_id: number
  quantity: number
  price: number
  total: number
}

import {Client} from "./client";
import {Product} from "./product";
import {Seller} from "./seller";

export interface Opportunity {
  id: number,
  identify: string,
  name: string,
  value: number,
  client_identify: string,
  products?: Product[],
  user_identify?: string
}

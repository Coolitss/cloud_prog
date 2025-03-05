import java.util.ArrayList;
import java.util.Scanner;

class Product{
    private String name;
    private double price;
    
    public Product(String name, double price){
        this.name = name;
        this.price = price;
    }
    
    public String getName(){
        return name;
    }
    
    public double getPrice(){
        return price;
    }
}
    
class InventoryManagementSystem{
    private ArrayList<Product> products;
    
    public InventoryManagementSystem(){
        products = new ArrayList<>();
    }
    
    public void addProducts(String name, double price){
        Product prod = new Product(name, price);
        products.add(prod);
        System.out.println("\nYou added a product: " + name + " ₱" + price);
    }
    
    public void displayProducts(){
        if(products.isEmpty()){
            System.out.println("No products available");
        }else{
            System.out.println("\nAll product lists: ");
            for(Product prod : products){
                System.out.println("* " + prod.getName() + ", ₱" + prod.getPrice());
            }
        }
    }
}

public class InventoryManagementApp{
    public static void main(String[] args){
        InventoryManagementSystem ims = new InventoryManagementSystem();
        
        Scanner sc = new Scanner(System.in);
        
        System.out.println("***************************************************");
        System.out.println("Welcome to my Inventory Management System\nCreated by: Florence D. Facton");
        System.out.println("***************************************************");
        
        while(true){
            System.out.println("\nMenu: ");
            System.out.println("1. Add Product");
            System.out.println("2. Display Products");
            System.out.println("3. Exit");
            
            System.out.print("Enter your choice: ");
            int choice = sc.nextInt();
            sc.nextLine();
            
            switch (choice){
                case 1:
                    System.out.print("\nEnter a Product Name: ");
                    String name = sc.nextLine();
                    System.out.print("\nEnter a Product Price: ");
                    double price = sc.nextDouble();
                    ims.addProducts(name,price);
                    break;
                    
                case 2: 
                    ims.displayProducts();
                    break;
                    
                case 3:
                    System.out.println("Goodbye!");
                    sc.close();
                    return;
                
                default:
                    System.out.println("Please enter a valid choice. Please try again");
            }
        }
    }
}

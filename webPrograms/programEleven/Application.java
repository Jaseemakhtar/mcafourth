import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
import java.sql.*;

public class Application extends JFrame implements ActionListener{
    JButton btnUpdate, btnFetch;
    JTextField txtId, txtName, txtEmail;
    JLabel lblId, lblName, lblEmail;
    Connection connection;
    Statement statement;

    public Application(Connection connection){
        this.connection = connection;

        txtId = new JTextField(20);
        txtName = new JTextField(20);
        txtEmail = new JTextField(20);

        lblId = new JLabel("ID: ");
        lblName = new JLabel("Name: ");
        lblEmail = new JLabel("Email: ");

        btnUpdate = new JButton("Update");
        btnFetch = new JButton("Fetch");

        setLayout(new GridLayout(0, 2));
        add(lblId);
        add(txtId);

        add(lblName);
        add(txtName);

        add(lblEmail);
        add(txtEmail);

        add(btnFetch);
        add(btnUpdate);

        btnFetch.addActionListener(this);
        btnUpdate.addActionListener(this);
        setTitle("Update Customer Information");
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setSize(420, 200);
        setVisible(true);
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        if(e.getSource() == btnFetch){
            try{
                String id = txtId.getText().trim();
                if("".equals(id)){
                    System.out.println("You should enter id first");
                    return;
                }else{
                    statement = connection.createStatement();
                    String sql = "SELECT * FROM programeleven WHERE id = " + id;
                    ResultSet resultSet = statement.executeQuery(sql);
                    if(resultSet.next()){
                        txtId.setText(resultSet.getInt(1) + "");
                        txtName.setText(resultSet.getString(2));
                        txtEmail.setText(resultSet.getString(3));
                    }else{
                        System.out.println("ID not found");
                        txtEmail.setText("");
                        txtName.setText("");
                        txtId.setText("");
                    }
                }


            }catch(Exception ex){
                System.out.println(ex);
            }
        }else{
            try{
                String id = txtId.getText().trim();
                String name = txtName.getText().trim();
                String email = txtEmail.getText().trim();

                if(id.equals("") && name.equals("") && email.equals("")){
                    System.out.println("Do not leave any field blank");
                    return;
                }else {
                    String sql = "UPDATE programeleven SET id = " + id + " , name = '" + name + "', email = '" + email + "' WHERE id = " + id;
                    if(statement.executeUpdate(sql) > 0){
                        System.out.println("Update successfully.");
                    }else{
                        System.out.println("Failed to update.");
                    }
                }
            }catch (Exception ex){
                System.out.println(ex);
            }
        }
    }
}

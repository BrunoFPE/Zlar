import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class MoradorDAO {

    // CREATE
    public void cadastrar(Morador m) {
        String sql = "INSERT INTO morador (nome, endereco, email, senha, telefone) VALUES (?, ?, ?, ?, ?)";

        try (Connection conn = Conexao.conectar();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, m.getNome());
            stmt.setString(2, m.getEndereco());
            stmt.setString(3, m.getEmail());
            stmt.setString(4, m.getSenha());
            stmt.setString(5, m.getTelefone());

            stmt.executeUpdate();
            System.out.println("Morador cadastrado!");

        } catch (Exception e) {
            System.out.println("Erro ao cadastrar: " + e.getMessage());
        }
    }

    // READ
    public List<Morador> listar() {
        List<Morador> lista = new ArrayList<>();
        String sql = "SELECT * FROM morador";

        try (Connection conn = Conexao.conectar();
             Statement stmt = conn.createStatement();
             ResultSet rs = stmt.executeQuery(sql)) {

            while (rs.next()) {
                Morador m = new Morador();
                m.setId(rs.getInt("id"));
                m.setNome(rs.getString("nome"));
                m.setEmail(rs.getString("email"));

                lista.add(m);
            }

        } catch (Exception e) {
            System.out.println("Erro ao listar: " + e.getMessage());
        }

        return lista;
    }

    // LOGIN
    public boolean login(String email, String senha) {
        String sql = "SELECT * FROM morador WHERE email = ? AND senha = ?";

        try (Connection conn = Conexao.conectar();
             PreparedStatement stmt = conn.prepareStatement(sql)) {

            stmt.setString(1, email);
            stmt.setString(2, senha);

            ResultSet rs = stmt.executeQuery();

            return rs.next();

        } catch (Exception e) {
            System.out.println("Erro no login: " + e.getMessage());
            return false;
        }
    }
}
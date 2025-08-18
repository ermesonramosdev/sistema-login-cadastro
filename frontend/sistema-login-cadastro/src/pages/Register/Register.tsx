import { Form } from "../../components/Form/Form";
import { LinkForm } from "../../components/LinkForm/LinkForm";

export const Register: React.FC = () => {
    return(
        <div className="container">
            <h1 style={{ textAlign: "center" }}>Cadastro</h1>
            <Form
                form={[
                    { label: "Nome: ", type: "text", name: "name" },
                    { label: "Email: ", type: "text", name: "email" },
                    { label: "Senha: ", type: "password", name: "password" },
                ]}
            />
            <LinkForm text="Fazer login" to="/login" />
        </div>
    );
}
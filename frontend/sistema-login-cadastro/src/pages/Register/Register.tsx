import { Form } from "../../components/Form/Form";

export const Register: React.FC = () => {
    return(
        <>
            <h1 style={{ textAlign: "center" }}>Cadastro</h1>
            <Form
                form={[
                    { label: "Nome: ", type: "text" },
                    { label: "Email: ", type: "text" },
                    { label: "Senha: ", type: "password" },
                ]}
            />
        </>
    );
}
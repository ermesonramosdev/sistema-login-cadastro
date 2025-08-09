import { Form } from "../../components/Form/Form";

export const Login: React.FC = () => {
    return(
        <>
            <h1 style={{ textAlign: "center" }}>Login</h1>
            <Form 
                form={[
                    { label: "Email", type: "text" },
                    { label: "Senha", type: "password" }
                    
                ]}
            />
        </>
        
    );
}
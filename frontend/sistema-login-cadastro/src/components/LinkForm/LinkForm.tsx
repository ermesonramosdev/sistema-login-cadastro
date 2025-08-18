import { Link } from "react-router-dom";
import "./LinkForm.css";

type LinkFormProps = {
    text: string;
    to: string;
}

export const LinkForm: React.FC<LinkFormProps> = ({ text, to }) => {
    return(
        <div className="container__button">
            <Link to={to} className="link">
                {text}
            </Link>"
       </div>
    );
}
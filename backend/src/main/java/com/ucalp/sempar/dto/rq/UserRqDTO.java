package com.ucalp.sempar.dto.rq;

import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.NoArgsConstructor;
import lombok.ToString;

@Data
@NoArgsConstructor
@AllArgsConstructor
public class UserRqDTO {

    private String username;
    @ToString.Exclude
    private String password;

}

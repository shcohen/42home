/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_tetri.c                                         :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/17 15:42:36 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/17 20:36:53 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

// checker si : 4 lignes puis EOF ou \n ; 4 caracteres (. ou #) puis un \n
// ET QU'IL N'Y A QUE 4 # PAR TETRIMINOS !!!!!!!!!!!!!!!
// 2 # qui touche 2 autres
// (1er c = t0, si i+5 > t0 + 20 = X ; si i-5 < t0 = X)
// verifier dans buffer, si tetri valide alors ->liste dans maillon indé
// dans chaque maillon, verifier si y a bien 21c ((nb maillon x 21) + nb maillon)

#include "include/fillit.h"
int    ft_tetri1(t_var *var)
{
    int i;
    int t0;
    int j;

    i = 0;
    t0 = i;
    j = 0;
    while (i <= 21)
    {
        if (!((i - t0 + 1) % 5) && var->str.buf[i] != '\n') // \n de fin de ligne
            return (-1);
        if (((i - t0 + 1) % 5) && var->str.buf[i] != '.' && var->str.buf[i] != '#') // . ou #
            return (-1);
        // if (((i - t0 + 1) % 5)) // +4 c
            // return (-1);
        if (var->str.buf[j] == '#') // +4 #
        {
            j++;
            if (var->str.buf[j] > 4)
                return (-1);
        }
        i++;
    }
    return (0);
}


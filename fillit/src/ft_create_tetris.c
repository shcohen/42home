/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_create_tetris.c                                 :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 20:15:54 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/20 23:06:15 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

t_tetris    *ft_create_tetris(char *buf, t_tetris *first) // création du maillon
{
    t_tetris    *maillon;
    int         i; // position dans le buffer

    i = 0;
    if (!(maillon = ft_memalloc(sizeof(t_tetris))))
        return (NULL);
    if (first == NULL)
        first = maillon; // 1er maillon sauvegardé
    maillon->next = NULL;
    maillon->tetris = ft_strsub(buf, 0, 20);
    while (buf[i] && i < 21)
        i++;
    ft_first_check(maillon->tetris);
    ft_check_forme(maillon->tetris);
    if (i == 21)
        maillon->next = ft_create_tetris(&buf[21], first);
    return (first);
}
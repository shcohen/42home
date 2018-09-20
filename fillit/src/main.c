/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/20 19:58:37 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/20 22:01:29 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

int     main(int argc, char **argv)
{
    int         fd;
    char        *buf;
    t_tetris    *first;

    if (argc != 2)
	{
		puts("usage: ./fillit [map with tetriminos]");
		return (1);
	}
    if (!(first = ft_memalloc(sizeof(t_tetris))))
        return(0);
    first = NULL;
	fd = ft_openfile(argv[1]);
    buf = ft_readfile(fd);
	ft_closefile(fd);
    first = ft_create_tetris(buf, first);
    return(0);
}

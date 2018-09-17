/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/09/13 16:04:24 by shcohen           #+#    #+#             */
/*   Updated: 2018/09/17 20:36:11 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../include/fillit.h"

int		main(int argc, char **argv)
{
	int			fd;
	t_var	var;
	
	if (argc != 2)
	{
		puts("usage: ./fillit [map with tetriminos]");
		return (1);
	}
	fd = ft_openfile(argv[1], &var);
	ft_readfile(fd, &var);
	ft_closefile(fd, &var);
	ft_tetri1(&var);
	return (0);
}
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/27 13:24:39 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/21 18:43:13 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int		ft_exit(void)
{
	exit(0);
}

int		main(int argc, char **argv)
{
	t_all	*all;

	if (!(all = (t_all *)ft_memalloc(sizeof(t_all))))
		return (-1);
	if (argc == 2)
	{
		if (!ft_parse_map(argv[1], all) && write(2, "Invalid map !\n", 13))
			return (-1);
		ft_create_window(all);
		mlx_hook(all->win.win_ptr, 2, (1L << 0), &ft_key, all);
		ft_array(all);
		mlx_hook(all->win.win_ptr, 17, 0, ft_exit, 0);
		mlx_loop(all->win.mlx_ptr);
	}
	else
		ft_putstr("usage : ./fdf <map_file>\n");
	return (0);
}
